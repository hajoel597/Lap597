<<<<<<< HEAD
<?php
/**
 * 테마의 기능을 설정하고 스타일/스크립트를 로드합니다.
 */

function my_journal_theme_setup() {
    // 1. 포스트 특성 이미지(썸네일) 기능 활성화
    add_theme_support( 'post-thumbnails' );

    // 2. 타이틀 태그 자동 생성
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_journal_theme_setup' );

function my_journal_scripts() {
    // 3. style.css 파일을 워드프레스 방식(Enqueue)으로 로드
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    // 4. 구글 폰트 로드
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100..900&display=swap', array(), null );
}
=======
<?php
/**
 * 테마의 기능을 설정하고 스타일/스크립트를 로드합니다.
 */

function my_journal_theme_setup() {
    // 1. 포스트 특성 이미지(썸네일) 기능 활성화
    add_theme_support( 'post-thumbnails' );

    // 2. 타이틀 태그 자동 생성
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_journal_theme_setup' );

function my_journal_scripts() {
    // 3. style.css 파일을 워드프레스 방식(Enqueue)으로 로드
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    // 4. 구글 폰트 로드
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100..900&display=swap', array(), null );
}
>>>>>>> de8ef100ec3404dd7e1b0d7b2d5e0ddb9f4fba41
add_action( 'wp_enqueue_scripts', 'my_journal_scripts' );