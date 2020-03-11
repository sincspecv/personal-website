export default {
  init() {

  },
  finalize() {
    /**
     * Toggle banner transparency class
     */
    const nav = document.querySelector('.banner');
    const hero = document.querySelector('.hero');

    const toggleTransparentClass = () => {
      let heroHeight = hero.clientHeight;
      let height = heroHeight * 0.25;

      if(nav.classList.contains('transparent') && window.pageYOffset > height) {
        nav.classList.remove('transparent')
      } else if(!nav.classList.contains('transparent') && window.pageYOffset <= height) {
        nav.classList.add('transparent')
      }
    }

    window.addEventListener('DOMContentLoaded', () => {
      if(document.body.classList.contains('has-hero')) {
        toggleTransparentClass()

        window.addEventListener('scroll', () => {
          toggleTransparentClass()
        });

        window.addEventListener('resize', () => {
          toggleTransparentClass()
        });
      }
    })

    /**
     * Mobile nav
     */
    const hamburger = document.querySelector('.navbar-burger')
    const mobileMenu = document.querySelector('.nav-mobile')
    hamburger.addEventListener('click', e => {
      e.preventDefault()
      mobileMenu.classList.toggle('active')
      const navItems = mobileMenu.querySelectorAll('.navbar-item');
      if(navItems.length && mobileMenu.classList.contains('active')) {
        let itemHeight = navItems[0].clientHeight
        let height = (itemHeight * navItems.length) + 33

        mobileMenu.style.height = `${height}px`
      } else {
        mobileMenu.style.height = 0;
      }
    })
  },
};
