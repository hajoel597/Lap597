<?php

// ----------------------------------------------------
// 테마 설정 및 썸네일 활성화
// ----------------------------------------------------
function mytheme_setup() {
    // 테마에서 'post-thumbnails' (특성 이미지/썸네일) 지원 활성화
    add_theme_support( 'post-thumbnails' );

    // 필요하다면 추가적인 이미지 사이즈 정의
    // set_post_thumbnail_size( 150, 150, true ); // 기본 썸네일 크기 설정
    // add_image_size( 'custom-large', 800, 600, true ); // 'custom-large' 이라는 새 이미지 크기 추가
}
add_action( 'after_setup_theme', 'mytheme_setup' );


// ----------------------------------------------------
// 스크립트 및 스타일시트 등록
// ----------------------------------------------------
function mytheme_scripts() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    
    // Google Fonts 아이콘 불러오기 (URL에 https:// 프로토콜 추가)
    wp_enqueue_style( 'google-material-icons', 'fonts.googleapis.com', array(), null );

    wp_enqueue_script( 'panel-script', get_template_directory_uri() . '/js/panel.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'header-script', get_template_directory_uri() . '/js/header.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

function enqueue_google_fonts_bbh_bogle() {
    // 1. preconnect 연결
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;

    // 2. 구글 폰트 스타일시트 로드
    wp_enqueue_style( 'google-font-bbh-bogle', 'https://fonts.googleapis.com/css2?family=BBH+Bogle&display=swap', array() );
}
add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts_bbh_bogle' );