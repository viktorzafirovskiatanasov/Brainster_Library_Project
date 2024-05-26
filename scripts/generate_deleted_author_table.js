import * as GenerateAuthorTable from "./generate_author_table.js";
import * as GenerateBookAuthor from "./generate_book_authors.js";
export function initializeDeletedAuthorTable() {
    $.get("./php/generate_deleted_authors.php", function (response) {
      if (response.status == "success") {

        const tableBody = $("#table_body_restore_author");
        tableBody.html(response.data);
  
        $(tableBody).on("click", ".restore-button", function (e) {
          e.preventDefault();
  
          let id = $(this).data("id");
          restoreAuthor(id);
        });
      }
    });
  }
  function restoreAuthor(id){
    $.post('./php/restore_author.php' , {id : id} , function(response){
         if(response.status == 'success'){
            initializeDeletedAuthorTable();
            GenerateAuthorTable.initializeAuthorTable();
            GenerateBookAuthor.generateAuthorDropDown();
         }
    })
  }