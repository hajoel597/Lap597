document.addEventListener('DOMContentLoaded', (event) => {
    const openButton = document.querySelector('.panel-open');
    const closeButton = document.querySelector('.panel-close');
    const panel = document.querySelector('.panel');

    if (!openButton || !closeButton || !panel) {
        console.error("필요한 HTML 요소를 찾을 수 없습니다. 클래스 이름을 확인해주세요.");
        return;
    }

    openButton.addEventListener('click', () => {
        panel.classList.add('open');
        panel.classList.remove('close');
        document.body.style.overflow = 'hidden';
    });

    closeButton.addEventListener('click', () => {
        panel.classList.add('close');
        panel.classList.remove('open');
        document.body.style.overflow = '';
    });
});
