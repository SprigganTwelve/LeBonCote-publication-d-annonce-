let contain = document.querySelectorAll(".rewrite");
console.log(contain);
contain.forEach((items) => {
  const result = getComputedStyle(items, ":before");
  result.addEventListener(() => {
    console.log(result);
  });
});
