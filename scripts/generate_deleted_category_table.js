import * as GenerateBookCategory from "./generate_book_category.js";
import * as GenerateCategoryTable from "./generate_category_table.js";
export function initializeDeletedCategoryTable() {
  
    $.get("./php/generate_deleted_categories.php", function (response) {
      if (response.status == "success") {
       
        const tableBody = $("#table_body_restore_category");
        tableBody.html(response.data);
  
        $(tableBody).on("click", ".restore-button", function (e) {
          e.preventDefault();
  
          let id = $(this).data("id");
          restoreCategory(id);
        });
      }
    });
  }
  function restoreCategory(id){
    $.post('./php/restore_category.php' , {id : id} , function(response){
         if(response.status == 'success'){
            initializeDeletedCategoryTable();
            GenerateBookCategory.generateCategryDropDown();
            GenerateCategoryTable.initializeCategoryTable();
         }
    })
  }