document.querySelectorAll("a[title=DELETE]").forEach((item) => {
  item.addEventListener("click", supplyTargetModal);
});
function supplyTargetModal(e){
  const industryName = e.target.parentElement.previousElementSibling.previousElementSibling.innerHTML;
  // console.log(industryName);
  document.querySelector("#selectedIndustry").innerHTML = industryName;
}
