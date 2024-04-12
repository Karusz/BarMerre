function showSidebar(){
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display='flex';
}
function hideSidebar(){
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display='none';
}

function Logout() {
    window.location="logout.php";
}

function Login() {
    window.location="login.php";
}