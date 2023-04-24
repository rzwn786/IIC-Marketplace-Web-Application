const toggleButton = document.getElementsByClassName('toggle-button')[0]
const headerLink = document.getElementsByClassName('header-link')[0]

toggleButton.addEventListener('click', () => {
  headerLink.classList.toggle('active')
})
