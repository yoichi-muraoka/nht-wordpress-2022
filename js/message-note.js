{
  const blanks = document.querySelectorAll('.blank')
  blanks.forEach(blank => {
    // 入力欄の幅設定
    const answer = blank.getAttribute('data-answer')
    if (answer) {
      const regExp = new RegExp(/^[ a-zA-Z0-9!-/:-@¥[-`{-~]*$/)
      const size = regExp.test(answer) ? answer.length / 2 : answer.length
      blank.style.width = size + 'em'
    } else {
      blank.style.width = '5em'
    }
    // コピー用spanタグの追加
    blank.parentNode.insertBefore(document.createElement('span'), blank)
    blank.addEventListener('change', event => {
      const span = event.target.previousElementSibling
      span.innerText = event.target.value
    })
  })
  // 空欄埋めボタンの設定
  const fillButtons = document.querySelectorAll('button.fill')
  fillButtons.forEach(button => {
    button.addEventListener('click', event => {
      const noteId = '#note-' + event.target.getAttribute('data-lang')
      document.querySelectorAll(noteId + ' .blank').forEach(blank => {
        blank.value = blank.getAttribute('data-answer')
        blank.previousElementSibling.innerText = blank.value
      })
    })
  })
  // コピーボタンの設定
  const copyButtons = document.querySelectorAll('button.copy')
  copyButtons.forEach(button => {
    button.addEventListener('click', event => {
      const note = document.getElementById(
        'note-' + event.target.getAttribute('data-lang')
      )
      const area = document.createElement('textarea')
      area.textContent = note.innerText
      document.body.appendChild(area)
      area.select()
      document.execCommand('copy')
      document.body.removeChild(area)
    })
  })
}

{
    document.querySelectorAll('.toggler-show_hide')
    .forEach(button => button.addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelector('.nav-tabs .active').classList.remove('active');
        event.target.classList.toggle('active');
        document.querySelectorAll('.toggle-show_hide').forEach(element => element.classList.toggle('d-none'));
    }));
}