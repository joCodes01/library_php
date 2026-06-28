// import { wordRegex } from "./regex.js";

// let title = document.getElementById("title");
// let author = document.getElementById("author");
// let publisher = document.getElementById("publisher");
// let language = document.getElementById("language");
// let category = document.getElementById("category");

// let editBookForm = document.getElementById("form-editbook");

// //////////////// VALIDATION FOR EDIT BOOK
// editBookForm.addEventListener("submit", (event) => {
//   event.preventDefault();

//   ///////////////////// validate title
//   if (title.value == "") {
//     alert("Enter the book title.");
//     return false;
//   }
//   if (!title.value == "" && !wordRegex.test(title.value)) {
//     alert("Only alphabet characters allowed.");
//     return false;
//   }

//   //////////////////// validate author
//   if (author.value == "") {
//     alert("Enter the authors name.");
//     return false;
//   }
//   if (!author.value == "" && !wordRegex.test(author.value)) {
//     alert("Only alphabet characters allowed.");
//     return false;
//   }

//   /////////////////// validate publisher
//   if (publisher.value == "") {
//     alert("Enter the publisher.");
//     return false;
//   }
//   if (!publisher.value == "" && !wordRegex.test(publisher.value)) {
//     alert("Only alphabet characters allowed.");
//     return false;
//   }

//   /////////////////// validate language
//   // no need as select option

//   /////////////////// validate category
//   // no need as select option

//   editBookForm.submit();
// });
