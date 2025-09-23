let notification = document.getElementById('notification');
let removenotif = document.querySelector('.removeNotification');
let btnnotif = document.getElementById('iconNotif')

btnnotif.addEventListener('click', ()=>{

    if(notification.classList.contains('activenotif')){
        notification.classList.toggle('desactivenotif')
    }else{
        notification.classList.add('activenotif')

        notification.addEventListener('click', (e)=>{
            if(e.target == e.currentTarget){
                notification.classList.add('desactivenotif')
            }
        })
        
        removenotif.addEventListener('click', ()=>{
            notification.classList.add('desactivenotif')
        })
    }
    
})
