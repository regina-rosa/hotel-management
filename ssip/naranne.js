function openAddRoom() {
  document.getElementById("newroom").style.display = "block";
}
function closeAddRoom() {
  document.getElementById("newroom").style.display = "none";
}
function openRoomTable() {
  document.getElementById("roomtable").style.display = "block";
}
function closeRoomTable() {
  document.getElementById("roomtable").style.display = "none";
}
function openUpdateRoom() {
  document.getElementById("updateroom").style.display = "block";
}
function closeUpdateRoom() {
  document.getElementById("updateroom").style.display = "none";
}
function openDeleteRoom() {
  document.getElementById("deleteroom").style.display = "block";
}
function closeDeleteRoom() {
  document.getElementById("deleteroom").style.display = "none";
}
function openAddTenant() {
  document.getElementById("newtenant").style.display = "block";
}
function closeAddTenant() {
  document.getElementById("newtenant").style.display = "none";
}
function openTenantTable() {
  document.getElementById("tenanttable").style.display = "block";
}
function closeTenantTable() {
  document.getElementById("tenanttable").style.display = "none";
}
function openUpdateTenant() {
  document.getElementById("updatetenant").style.display = "block";
}
function closeUpdateTenant() {
  document.getElementById("updatetenant").style.display = "none";
}
function openDeleteTenant() {
  document.getElementById("deletetenant").style.display = "block";
}
function closeDeleteTenant() {
  document.getElementById("deletetenant").style.display = "none";
}
function openBook() {
  document.getElementById("book").style.display = "block";
}
function closeBook() {
  document.getElementById("book").style.display = "none";
}
function openBookTable() {
  document.getElementById("booktable").style.display = "block";
}
function closeBookTable() {
  document.getElementById("booktable").style.display = "none";
}
function getDate(){
  var today = new Date();
  document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}
function openLogin() {
  document.getElementById("log").style.display = "block";
}
function closeLogin() {
  document.getElementById("log").style.display = "none";
}
function openIncomeDate() {
  document.getElementById("incomeDate").style.display = "block";
}
function closeIncomeDate() {
  document.getElementById("incomeDate").style.display = "none";
}
function openIncomeRoom() {
  document.getElementById("incomeRoom").style.display = "block";
}
function closeIncomeRoom() {
  document.getElementById("incomeRoom").style.display = "none";
}