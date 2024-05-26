import * as  FooterMessage from './footer_message.js';
FooterMessage.getFooterMessage()
 checkUser();

  function checkUser(){
  $.get("./php/verify_login.php" , function(response){
     if(response.login === false){
       $("#dashboard").hide();
       $("#logout").hide();
     }
     else if(response.role !== 'admin'){
      $("#dashboard").hide();
      $("#login").hide();
     }
     else if(response.role === 'admin'){
      $("#login").hide();
     }
  })
}

$("#logout").on("click" , function(e){
   e.preventDefault();
   $.get("./php/logout.php", function(response){
    if(response.status === 'success'){
      $("#dashboard").hide();
      $("#logout").hide();
      $("#login").show();
    }
   })
})
$(document).on('click', '.select_filer', function () {
  toggleBackgroundColor(this);
});
$("#open_filters").on("click", function (e) {
    e.preventDefault();

    $.get("./php/generate_filters.php", function (response) {
      $(".by_category_options").html(response.data.html["categories"]);
      $(".by_authors_options").html(response.data.html["authors"]);
      
    }).done(function () {
      $("#open_filters").toggle();
      $("#filter_form").toggle();
    });
  });
  $("#apply_filters").on("click", function (e) {
    e.preventDefault();
    let selectedCategories = $("input[name='categories[]']:checked")
      .map(function () {
        return $(this).val();
      })
      .get();

    let selectedAuthors = $("input[name='authors[]']:checked")
      .map(function () {
        return $(this).val();
      })
      .get();
      $("#open_filters").toggle();
      $("#filter_form").toggle();
    var minYear = $("#min_year").val();
    var maxYear = $("#max_year").val();
    var minPages = $("#min_pages").val();
    var maxPages = $("#max_pages").val();
  
    $.post(
      "./php/get_filtered_books.php",
      {
        selectedAuthors: selectedAuthors,
        selectedCategories: selectedCategories,
        minPages: minPages,
        maxPages: maxPages,
        minYear: minYear,
        maxYear: maxYear,
      },
      function (response) {
        if (response.status === "success") {
          $("#card_container").html('');
          $('#card_container').html(response.data);
          
        } else {
         let responseText = response.message
         $("#card_container").html('');
          $("#card_container").html(responseText);
        }
      }
    );
  });
  function generateCards() {
  
$.get('./php/generate_book_cards.php', function(response) {
    if (response.status === 'success') {
        $('#card_container').html(response.data);
        $('#card_container').on('click', 'button', function() {
          
          let bookId = $(this).data('book-id');
          localStorage.setItem('cardInfo', JSON.stringify(bookId));
         
    location.href = './singleBook.html';

         
        });
    }
   
});


}
function toggleBackgroundColor(label) {
var checkbox = $(label).find('.checkbox-input');
$(label).toggleClass('bg-green-500', checkbox.prop('checked'));
$(label).toggleClass('bg-red-500', !checkbox.prop('checked'));
}
generateCards();
