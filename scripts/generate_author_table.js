import * as AdminPanel from "./admin_pannel.js";
import * as DeletedAuthors from './generate_deleted_author_table.js';
export function initializeAuthorTable() {
  $.get("./php/generate_author_table.php", function (response) {
    if (response.status == "success") {
      const tableBody = $("#table_body_author");
      tableBody.html(response.data);

      $(tableBody).on("click", ".edit-button", function (e) {
        e.preventDefault();

        let id = $(this).data("id");

        let authorData = {
          add_author_name: $(this).closest("tr").data("author-name"),
          add_author_surrname: $(this).closest("tr").data("author-surrname"),
          add_author_bio: $(this).closest("tr").data("author-bio"),
        };

        AdminPanel.setEditData(true, id, authorData);
      });

      $(tableBody).on("click", ".delete-button", function (e) {
        e.preventDefault();
        let authorId = $(this).data("id");
        deleteAuthor(authorId);
        initializeAuthorTable();
        DeletedAuthors.initializeDeletedAuthorTable();
      });
    }
  });
}

export function deleteAuthor(id) {
  $.post("./php/delete_author.php", { id: id }, function (response) {
    return true;
  });
}
