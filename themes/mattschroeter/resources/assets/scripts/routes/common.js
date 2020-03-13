export default {
  init() {

  },
  finalize() {
    /**
     * Toggle banner transparency class
     */

    const toggleTransparentClass = (element, height) => {

      if(element.classList.contains('transparent') && window.pageYOffset > height) {
        element.classList.remove('transparent')
      } else if(!element.classList.contains('transparent') && window.pageYOffset <= height) {
        element.classList.add('transparent')
      }
    };

    window.addEventListener('DOMContentLoaded', () => {
      const nav = document.querySelector('.banner');
      const hero = document.querySelector('.hero');
      let heroHeight = hero.clientHeight;
      
      if(document.body.classList.contains('has-hero')) {
        toggleTransparentClass(nav, heroHeight)

        window.addEventListener('scroll', () => {
          toggleTransparentClass(nav, heroHeight)
        });

        window.addEventListener('resize', () => {
          heroHeight = hero.clientHeight;
          toggleTransparentClass(nav, heroHeight)
        });
      }
    });

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
