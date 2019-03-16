document.addEventListener("DOMContentLoaded",function(){
        const current = document.querySelector('#current');
        const imgs = document.querySelector('.img-gal');
        const img = document.querySelectorAll('.img-gal');
        const opacity = 0.6;

        // Set first img opacity
        if (img.length > 1) {
            let all_images = Array.from(img);
            all_images.map(i => i.addEventListener('click', imgClick));
            img[1].style.opacity = opacity
        }


        function imgClick(e) {
          // Change current image to src of clicked image
          current.src = e.target.src;

            //clear all styl
            let all_images = Array.from(img);
            all_images.map(i => i.style.opacity = 1  );

          // Add fade in class
          e.target.style.opacity = opacity

          // Add fade in class
          current.classList.add('fade-in');

          // Remove fade-in class after .5 seconds
          setTimeout(() => current.classList.remove('fade-in'), 500);

        }
    //change the img0 href when clicked
    
    //this is to load more posts
    let page = 1;
    let ajaxgalerie = document.getElementsByClassName('galerie-ajax')[0];
    let btn_more = document.getElementById('see-more');
    if (btn_more != null ) {
        let ajaxurl = btn_more.dataset.url;
        btn_more.addEventListener("click",function () {
            btn_more.innerHTML = 'Chargement ...';
            page += 1;
            fetch(ajaxurl, {
                    method: "POST", // *GET, POST, PUT, DELETE, etc.
                    mode: "cors", // no-cors, cors, *same-origin
                    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: "same-origin", // include, *same-origin, omit
                    headers: { "Content-Type": "application/x-www-form-urlencoded", },
                    redirect: "follow", // manual, *follow, error
                    referrer: "no-referrer", // no-referrer, *client
                    body: "action=load_more&page="+page,
            })
            
            .then(resp =>  resp.text())
            .then(data => { 
                ajaxgalerie.insertAdjacentHTML('beforeend' ,  data); 
                btn_more.innerHTML = 'Voir Plus';
            })
            .catch(err => { console.log(err) });

        })
    }
    //this is to load more posts
})


