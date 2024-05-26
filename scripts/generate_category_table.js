import * as AdminPanel from "./admin_pannel.js";
import * as DeletedCategories from './generate_deleted_category_table.js';
export function initializeCategoryTable() {
  $.get("./php/generate_category_table.php", function (response) {
    if (response.status == "success") {
      const tableBody = $("#table_body_category");
      tableBody.html(response.data);

      $(tableBody).on("click", ".edit-button", function (e) {
        e.preventDefault();
        let CategoryData = {
          add_category_name: $(this).closest("tr").data("title"),
        };
        let categoryId = $(this).data("id");

        AdminPanel.setEditData(true, categoryId, CategoryData);
      });

      $(tableBody).on("click", ".delete-button", function (e) {
        e.preventDefault();

        let categoryId = $(this).data("id");
        deleteCategory(categoryId);
        initializeCategoryTable();
        DeletedCategories.initializeDeletedCategoryTable();
      });
    }
  });
}
function deleteCategory(id) {
  $.post("./php/delete_category.php", { id: id }, function (response) {
    return true;
  });
}
export function getId() {
  return id;
}
