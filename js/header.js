document.addEventListener('DOMContentLoaded', () => {
    // 요소를 선택합니다. 이번에는 <header> 태그를 직접 선택합니다.
    const mainHeader = document.querySelector('header');

    // 요소가 없으면 스크립트 실행을 중단합니다.
    if (!mainHeader) {
        console.error("'<header>' 요소를 찾을 수 없습니다. HTML 구조를 확인해주세요.");
        return;
    }

    // 스크롤 위치를 추적하기 위한 변수 (초기 위치 설정)
    let lastScrollY = window.scrollY;

    // 초기 상태 설정: HTML에서 <header class="nav-down"> 으로 시작하므로 별도 JS 설정은 필요 없습니다.

    // 스크롤 이벤트 리스너
    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;

        // 사용자가 스크롤을 내릴 때 (down)
        if (currentScrollY > lastScrollY) {
            // 헤더를 숨기기 위해 'nav-up' 클래스를 추가하고 'nav-down' 제거
            mainHeader.classList.remove('nav-down');
            mainHeader.classList.add('nav-up');
        }
        // 사용자가 스크롤을 올릴 때 (up)
        else {
            // 헤더를 보이게 하기 위해 'nav-down' 클래스를 추가하고 'nav-up' 제거
            mainHeader.classList.add('nav-down');
            mainHeader.classList.remove('nav-up');
        }

        // 다음 스크롤 이벤트를 위해 현재 위치 저장
        lastScrollY = currentScrollY;
    });
});
