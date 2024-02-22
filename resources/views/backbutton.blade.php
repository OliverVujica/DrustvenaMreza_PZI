<button
        type="button"
        class="btn btn-custom-color btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="fas fa-arrow-up"></i>
</button>

<style>
    #btn-back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none;
}

  .btn-custom-color {
    background-color: #ed1c24;
    color: white;
}

.btn-custom-color:hover {
  background-color: #f2f2f2;
  color: #ed1c24;
  transition: 0.3s;
  border: 1px solid #ed1c24;
}
</style>

<script>
    let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>