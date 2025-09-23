let liens = document.querySelectorAll('#lien')
    
liens.forEach(lien =>{
if(lien.href == window.location.href){
    lien.style.backgroundColor ="#f5f5f5";      
    lien.style.color ="black";      
    lien.style.paddingLeft ="1.25rem";      
    lien.style.overflowX='hidden';      
}
})