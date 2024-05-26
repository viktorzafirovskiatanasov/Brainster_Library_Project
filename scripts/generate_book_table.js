import * as AdminPanel from "./admin_pannel.js";
export function generateBookTable() {
  $.get("./php/generate_book_table.php", function (response) {
    if (response.status === "success") {
      const bookTable = $("#table_body_book");
      bookTable.html(response.data);

      $(bookTable).on("click", ".edit-button", function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        let bookData = {
          title: $(this).closest("tr").data("book-title"),
          author: $(this).closest("tr").data("book-author-name"),
          year: $(this).closest("tr").data("book-year"),
          pages: $(this).closest("tr").data("book-pages"),
          picture: $(this).closest("tr").data("book-image-url"),
          category: $(this).closest("tr").data("book-category"),
        };

        AdminPanel.setEditData(true, id, bookData);
      });

      $(bookTable).on("click", ".delete-button", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        confirmDeleteModal(id);
      });
    } else {
      console.error("Error fetching categories:", response);
    }
  });
}

function confirmDeleteModal(bookId) {
  Swal.fire({
    title: "Are you sure?",
    text: "YOU WILL DELETE ALL COMMENTS AND NOTES FOR THIS BOOK AS WELL. THIS CHANGE IS NOT REVERSABLE",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      deleteBook(bookId);
    }
  });
}

function deleteBook(bookid) {
  $.post("./php/delete_book.php", { bookid: bookid }, function (response) {
    if (response.status == "success") {
      generateBookTable();
    }
  });
}
