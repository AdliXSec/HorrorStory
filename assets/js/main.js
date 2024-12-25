(() => {
    'use strict';

    const web_url = 'http://localhost/horror2/';

    const navbarToggle = document.querySelector('.navbar-toggle'),
          navbarMenu = document.querySelector('.navbar-menu'),
          navbarMenuClose = document.querySelector('.navbar-menu-close'),
          navbarInput = document.querySelector('.navbar-input');

    navbarToggle.addEventListener('click', () => {
        navbarToggle.classList.add('focus');
        navbarMenu.classList.add('focus');
    });

    navbarMenuClose.addEventListener('click', () => {
        navbarToggle.classList.remove('focus');
        navbarMenu.classList.remove('focus');
    });

    const cekValue = (e) => {
        const { target } = e;
        const filter = target.value.replace(/"|<|>|'|=|\+|-|`/gi, '');
        target.value = filter;
    }

    navbarInput.addEventListener('input', (e) => cekValue(e));
    navbarInput.addEventListener('change', () => {
        window.location.replace(`${web_url}search?query=${navbarInput.value}`);
    });

    const inputElement = [...document.querySelectorAll('input')] || [];
    const textareaElement = [...document.querySelectorAll('textarea')] || [];
    inputElement.forEach((el) => el.addEventListener('input', (e) => cekValue(e)));
    textareaElement.forEach((el) => el.addEventListener('input', (e) => cekValue(e)));

    const musicPlay = document.querySelector('.music-play'),
          musicPlayBack = document.querySelector('.music-play-back'),
          musicPlayForwards = document.querySelector('.music-play-forwards');
    const dataNum = ['music_1.mp3', 'music_2.mp3'];
    const musicPlayIcon = ['<i class="fas fa-play"></i>', '<i class="fas fa-pause"></i>'];
    
    var music = new Audio(`${web_url}assets/music/${dataNum[0]}`);

    musicPlay.addEventListener('click', () => {
        if (parseInt(musicPlay.getAttribute('data-num')) === 1) {
            musicPlay.innerHTML = musicPlayIcon[1];
            musicPlay.setAttribute('data-num', 0);
            music.play();
        } else {
            musicPlay.innerHTML = musicPlayIcon[0];
            musicPlay.setAttribute('data-num', 1);
            music.pause();
        }
    });

    musicPlayForwards.addEventListener('click', () => {
        music.pause();
        musicPlay.innerHTML = musicPlayIcon[0];
        musicPlay.setAttribute('data-num', 1);
        music = new Audio(`${web_url}assets/music/${dataNum[1]}`);
        music.currentTime = 0;
        musicPlay.innerHTML = musicPlayIcon[1];
        musicPlay.setAttribute('data-num', 0);
        music.play();
    });

    musicPlayBack.addEventListener('click', () => {
        music.pause();
        musicPlay.innerHTML = musicPlayIcon[0];
        musicPlay.setAttribute('data-num', 1);
        music = new Audio(`${web_url}assets/music/${dataNum[0]}`);
        music.currentTime = 0;
        musicPlay.innerHTML = musicPlayIcon[1];
        musicPlay.setAttribute('data-num', 0);
        music.play();
    });

})();