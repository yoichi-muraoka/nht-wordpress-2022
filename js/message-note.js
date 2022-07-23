{
  const blanks = document.querySelectorAll('.blank')
  blanks.forEach(blank => {
    // コピー用spanタグの追加
    const spanElementToAdd = document.createElement('span')
    spanElementToAdd.classList.add('blank-span', 'is-empty')
    spanElementToAdd.addEventListener('click', (e) => {
      e.target.classList.add('is-filling')
    })

    blank.parentNode.insertBefore(spanElementToAdd, blank)
    blank.addEventListener('change', event => {
      const span = event.target.previousElementSibling
      span.innerText = event.target.value
      span.classList.remove('is-filling')
      if(span.innerText == '') {
        span.classList.add('is-empty')
      } else {
        span.classList.remove('is-empty')
      }
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


/**
 * 表示コンテンツ(ノート、アナウンス、動画)の切り替え
 */
{
    document.querySelectorAll('.toggler-show_hide')
    .forEach(button => button.addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelector('.nav-tabs .active').classList.remove('active');
        event.target.classList.toggle('active');
        document.querySelectorAll('.toggle-show_hide').forEach(element => element.classList.add('d-none'));
        document.querySelector(event.target.getAttribute('data-target')).classList.remove('d-none');
    }));
}