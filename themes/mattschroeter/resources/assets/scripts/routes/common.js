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
  },
};
