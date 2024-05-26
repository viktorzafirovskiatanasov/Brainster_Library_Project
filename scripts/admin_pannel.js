import * as GenerateCommentTables from "./generate_comment_tables.js";
import * as GenerateAuthorTable from "./generate_author_table.js";
import * as GenerateBookAuthor from "./generate_book_authors.js";
import * as GenerateBookCategory from "./generate_book_category.js";
import * as GenerateBookTable from "./generate_book_table.js";
import * as GenerateCategoryTable from "./generate_category_table.js";
import * as  FooterMessage from './footer_message.js';
import * as DeletedAuthors from './generate_deleted_author_table.js';
import * as DeletedCategories from './generate_deleted_category_table.js';
$.get("./php/verify_login.php", function (response) {
  if (response.role != "admin") {
    location.href = "./homepage.html";
  }
});
FooterMessage.getFooterMessage()
$("#logout").on("click", function (e) {
  e.preventDefault();
  $.get("./php/logout.php", function (response) {
    if (response.status == "success") {
      location.href = "./homepage.html";
    }
  });
});

let isEdit = false;
let id = "";

$(".nav_toggle").on('click' ,function(){
  document.querySelector(".sidebar").classList.toggle("hidden");
})
// function openSidebar() {
//   document.querySelector(".sidebar").classList.toggle("hidden");
// }
function enableDropDown() {
  $(".toggle-dropdown").click(function () {
    $(this).next("ul.desplegable").toggleClass("hidden");
  });
}
export function setEditData(edit, inputId, data) {
  isEdit = edit;
  id = inputId;

  for (let key in data) {
    $(`#${key}`).val(data[key]);
  }
}

// Function to handle form submission
function handleFormSubmission() {
  $(".submit_button").click(function (e) {
    e.preventDefault();
    let submitButton = $(this);
    let formId = $(this).data("form");
    let form = $("#" + formId);
    let path = form.data("path");
    let editPath = form.data("edit");
    let formData = form.serialize();
    console.log(path)
    $.post(
      `./php/${isEdit ? editPath : path}.php`,
      { formData: formData, ...(isEdit ? { id: id } : {}) },
      function (response) {
        console.log(response);
        let result = response;
        if (result.status === "success") {
          handleSuccess(submitButton, result.message);
          form.find(":input").val("");
        } else {
          handleError(submitButton, result.message);
        }
      }
    );
  });
}

// Function to handle success
function handleSuccess(submitButton, message) {
  let successId = submitButton.data("success");
  let success_field = $("#" + successId);
  let success_message = $(success_field).find("> p");
  success_field.removeClass("hidden");
  success_message.html(`${message}`);
  GenerateCategoryTable.initializeCategoryTable();
  GenerateAuthorTable.initializeAuthorTable();
  GenerateBookTable.generateBookTable();
  setTimeout(function () {
    success_field.addClass("hidden");
  }, 3000);
}

// Function to handle error
function handleError(submitButton, message) {
  let errorId = submitButton.data("error");
  let error_field = $("#" + errorId);
  let error_message = $(error_field).find(" > p");
  error_field.removeClass("hidden");
  error_message.html(`Error: ${message}`);
  setTimeout(function () {
    error_field.addClass("hidden");
  }, 3000);
}
function toggleSection() {
  $(".toggle-button").click(function () {
    let sectionId = $(this).data("section");
    let section = $("." + sectionId + "Section");
    $(".section").addClass("hidden");
    $(".toggle-button").removeClass(
      "bg-gradient-to-r from-orange-400 to-amber-200"
    );
    $(this).addClass("bg-gradient-to-r from-orange-400 to-amber-200");
    section.removeClass("hidden");
  });
}

// Initialize category table and handle form submission when the document is ready
$(document).ready(function () {
  enableDropDown();
  GenerateAuthorTable.initializeAuthorTable();
  GenerateCategoryTable.initializeCategoryTable();
  handleFormSubmission();
  toggleSection();
  GenerateBookAuthor.generateAuthorDropDown();
  GenerateBookCategory.generateCategryDropDown();
  GenerateBookTable.generateBookTable();
  GenerateCommentTables.generateCommentTables();
  DeletedAuthors.initializeDeletedAuthorTable();
  DeletedCategories.initializeDeletedCategoryTable();
});
