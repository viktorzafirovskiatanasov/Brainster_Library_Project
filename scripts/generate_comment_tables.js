export function generateCommentTables() {
    $.get("./php/generate_comment_tables.php", function (response) {
      if (response.status == "success") {
        $("#table_body_pending").html(response.pending);
        $("#table_body_approved").html(response.approved);
        $("#table_body_denied").html(response.denied);
  
        $("#table_body_pending").on("click", ".deny_button", function (e) {
          handleButtonClick('DENIED', e, this);
        });
  
        $("#table_body_pending").on("click", ".approve_button", function (e) {
          handleButtonClick('APPROVED', e, this);
        });
  
        $("#table_body_approved").on("click", ".deny_button", function (e) {
          handleButtonClick('DENIED', e, this);
        });
  
        $("#table_body_denied").on("click", ".approve_button", function (e) {
          handleButtonClick('APPROVED', e, this);
        });
      }
    });
  }
  
 export function handleButtonClick(newStatus, e, clickedElement) {
    e.preventDefault();
    const comment_id = $(clickedElement).closest("tr").data("id");
    $.post('./php/change_comment_status.php', { comment_id : comment_id, newStatus : newStatus }, function (response) {
      if (response.status == 'success') {
        generateCommentTables();
      }
    });
  }
  

  