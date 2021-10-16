$(document).ready(function(){
    let theme = localStorage.getItem('data-theme');
    const changeThemeToDark = () => {
        document.documentElement.setAttribute("class", "dark")
        localStorage.setItem("data-theme", "dark")
    }
    const changeThemeToLight = () => {
        document.documentElement.setAttribute("class", "light")
        localStorage.setItem("data-theme", 'light')
    }
    const checkbox = document.getElementById("toggle");
    checkbox.addEventListener('change', () => {
        let theme = localStorage.getItem('data-theme');
        if (theme ==='dark'){
            changeThemeToLight();
        }else if(theme === 'light'){
            changeThemeToDark();
        }   
    });
    if (theme ==='dark'){
        changeThemeToDark();
        document.getElementById("toggle").checked=true;
    }else if(theme === 'light'){
        changeThemeToLight();
        document.getElementById("toggle").checked=false;
    }  
});