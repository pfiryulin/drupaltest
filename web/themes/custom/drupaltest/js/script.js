let btn = document. querySelectorAll('.btn');

if(btn.length){
    btn.forEach(function(b){
        b.addEventListener('click', ()=>{
            filterCat(category, 'new_news')   
        })
    })
}

function filterCat(id, path){
    let cat = id.value;
    let link = '';
    link = link +'/'+ path +'/'+ cat +'/all' ;
    window.location.replace(link);
    localStorage.setItem('category', cat);
}



