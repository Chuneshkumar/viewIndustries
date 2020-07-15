const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector("#sidebarToggler");
const navBar = document.querySelector("nav.navbar");
const main = document.querySelector("#main");
document.addEventListener("DOMContentLoaded", resizeHandler);
window.addEventListener("resize", resizeHandler);
function resizeHandler(){
  if(window.innerWidth<800)
  {
    closeSideBar();
  }
  else{
    openSideBar();
  }
}
sidebarToggler.addEventListener("click", e=>{
  if(sidebar.classList.contains("open")){
    closeSideBar();
  }
  else{
    openSideBar();
  }
  e.preventDefault();
});
function closeSideBar(){
  sidebar.style.width="0";
  main.style.marginLeft="0";
  navBar.style.marginLeft = "50px";
  sidebar.classList.toggle("open");
  sidebarToggler.innerHTML="&#9776;";
}
function openSideBar(){
  sidebar.style.width="250px";
  main.style.marginLeft="250px";
  navBar.style.marginLeft = "250px";
  sidebarToggler.innerHTML="&times;";
  sidebar.classList.toggle("open");

}

const sidebarLinks = document.querySelectorAll(".category-courses .list-group-item-action");
sidebarLinks.forEach(sidebarLink =>{
  sidebarLink.addEventListener("click", sidebarLinkListener);
});
function sidebarLinkListener(e){
  sidebarLinks.forEach(sidebarLink => {
    sidebarLink.classList.remove("sidebarLinkactive");
  });
  e.target.nextElementSibling.classList.toggle("dropdownMenu");
  e.target.classList.add("sidebarLinkactive");
  console.log("clicked", e.target.nextElementSibling);
}
