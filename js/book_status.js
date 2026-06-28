let bookStatusGroup = document.querySelectorAll(".book-status");

bookStatusGroup.forEach((bookStatus) => {
  if (bookStatus.classList.contains("available")) {
    bookStatus.textContent = "Borrow";
    bookStatus.value = onlostpointercapture;
  }
  if (bookStatus.classList.contains("onloan")) {
    bookStatus.textContent = "On loan";
  }
  bookStatus.addEventListener("click", () => {
    bookStatus.classList.remove("available");
    bookStatus.classList.add("onloan");
  });
});
