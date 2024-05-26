import * as  FooterMessage from './footer_message.js';
FooterMessage.getFooterMessage();
let storedCardInfo = localStorage.getItem("cardInfo");
let bookId = JSON.parse(storedCardInfo);

checkUser();
$("#logout").on("click", function (e) {
  e.preventDefault();
  $.get("./php/logout.php", function (response) {
    if (response.status === "success") {
      $("#dashboard").hide();
      $("#logout").hide();
      $("#login").show();
    }
  });
});

function checkUser() {
  $.get("./php/verify_login.php", function (response) {
    if (response.login === false) {
      $("#dashboard").hide();
      $("#logout").hide();
    } else if (response.role !== "admin") {
      $("#dashboard").hide();
      $("#login").hide();
    } else if (response.role === "admin") {
      $("#login").hide();
    }
  });
}

$.post("./php/generate_book_card.php", { bookId: bookId }, function (response) {
  if (response.status == "success") {
    $("#card-holder").html(response.data);
  }
});

$("#note_submit").on("click", function (e) {
  e.preventDefault();
  let note = $("#note").val();
  $.post(
    "./php/add_new_note.php",
    { note: note, bookId: bookId },
    function (response) {
      if (response.status == "success") {
        printAllNotes();
      } else {
        $("#note_error_field").removeClass("hidden");
        $("#note_error_message").html(`YOU HAVE TO BE LOGGED IN TO ADD A NOTE`);
        $("#note").val("");
        setTimeout(function () {
          $("#note_error_field").addClass("hidden");
        }, 3000);
      }
    }
  );
});
$("#comment_submit").on("click", function (e) {
  e.preventDefault();
  let comment = $("#comment").val();
  $.post(
    "./php/add_new_comment.php",
    { comment: comment, bookId: bookId },
    function (response) {
      if (response.status == "success") {
        showUserComment();
        $("#comment").val("");
      } else {
        $("#comment_error_field").removeClass("hidden");
        $("#comment_error_message").html(response.message);
        $("#comment").val("");
        setTimeout(function () {
          $("#comment_error_field").addClass("hidden");
        }, 3000);
      }
    }
  );
});
function printAllNotes() {
  $.post("./php/get_all_notes.php", { bookId: bookId }, function (response) {
    if (response.status == "success") {
      $("#notes-holder").html(response.data);

      $("#notes-holder").on("click", ".edit", function (event) {
        event.stopPropagation();

        let noteContainer = $(this).closest(".rounded");
        let noteContent = noteContainer.find(".note");
        let originalNote = noteContent.text();
        noteContent.addClass("editable");
        noteContent.attr("contenteditable", "true");
        noteContent.data("originalNote", originalNote);
        $(this).hide();
        noteContainer.find(".submit, .cancel").show();
      });

      $("#notes-holder").on("click", ".submit", function (event) {
        event.stopPropagation();

        let submitNoteId = $(this).data("submit-note-id");
        let submitedNote = $(this).closest(".rounded").find(".note").text();
        $.post(
          "./php/edit_note.php",
          { note_id: submitNoteId, note: submitedNote },
          function (response) {
            if (response.status == "success") {
              printAllNotes();
            }
          }
        );
      });

      $("#notes-holder").on("click", ".delete", function (event) {
        event.stopPropagation();

        let deleteNoteId = $(this).data("delete-note-id");
        $.post(
          "./php/delete_note.php",
          { note_id: deleteNoteId },
          function (response) {
            if (response.status == "success") {
              printAllNotes();
            }
          }
        );
      });

      $("#notes-holder").on("click", ".cancel", function (event) {
        event.stopPropagation();

        let noteContainer = $(this).closest(".rounded");
        let noteContent = noteContainer.find(".note");
        noteContent.text(noteContent.data("originalNote"));
        noteContent.attr("contenteditable", "false");
        noteContent.removeClass("editable");
        noteContainer.find(".edit").show();
        noteContainer.find(".submit, .cancel").hide();
      });
    }
  });
}
function showUserComment() {
  $.post("./php/get_comments.php", { bookId: bookId }, function (response) {
    if (response.status == "success") {
      $("#comment-holder").html(response.currentUser);

      $("#comments-holder").html(response.allUsers);

      $("#comment-holder").on("click", ".delete-comment", function () {
        var commentId = $(this).data("comment-id");

        deleteComment(commentId);
      });
    }
  });
}

function deleteComment(comment_id) {
  $.post(
    "./php/delete_comment.php",
    { comment_id: comment_id },
    function (response) {
      if (response.status == "success") {
        showUserComment();
      }
    }
  );
}

printAllNotes();
showUserComment();
