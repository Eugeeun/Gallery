'use strict';

// index
const sidebarmenu = document.querySelector('.sidebar');

function sidebarTog() {
  sidebarmenu.classList.toggle('active');
}

document.addEventListener('scroll', () => {
  if (sidebarmenu.classList.contains('active')) {
    sidebarmenu.classList.toggle('active');
  }
});

// login_form
function login_check_input() {
  if (!document.login_form.id.value) {
    alert('아이디를 입력하세요');
    document.login_form.id.focus();
    return;
  }

  if (!document.login_form.password.value) {
    alert('비밀번호를 입력하세요');
    document.login_form.password.focus();
    return;
  }
  document.login_form.submit();
}

// member_form
function check_input(type) {
  console.log(type);
  if (type === 'insert') {
    if (!document.member_form.id.value) {
      // 이 문서의 member_form의 id의 값이 없다면
      alert('아이디를 입력하세요!');
      document.member_form.id.focus();
      return;
    }
  }

  if (!document.member_form.password.value) {
    alert('비밀번호를 입력하세요!');
    document.member_form.password.focus();
    return;
  }

  if (!document.member_form.password_confirm.value) {
    alert('비밀번호확인을 입력하세요!');
    document.member_form.password_confirm.focus();
    return;
  }

  if (!document.member_form.name.value) {
    alert('이름을 입력하세요!');
    document.member_form.name.focus();
    return;
  }
  if (!document.member_form.email.value) {
    alert('이메일 주소를 입력하세요!');
    document.member_form.email.focus();
    return;
  }

  if (
    document.member_form.password.value !=
    document.member_form.password_confirm.value
  ) {
    alert('비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!');
    document.member_form.password.focus();
    document.member_form.password.select();
    return;
  }
  document.member_form.submit(); // 확인이 완료되었으면 submit
  // html에서 submit하는 것과 같이 이벤트 발생
}

function reset_form(type) {
  if (type === 'insert') {
    document.member_form.id.value = '';
    document.member_form.id.focus(); // id가 있는 곳으로 커서가 향함
  } else {
    document.member_form.password.focus();
  }
  document.member_form.password.value = '';
  document.member_form.password_confirm.value = '';
  document.member_form.name.value = '';
  document.member_form.email.value = '';
  // console.log(document.member_form);
  return;
}

function check_id() {
  window.open(
    'member_check_id.php?id=' + document.member_form.id.value,
    'IDcheck',
    'left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes'
  );
}

// community
function community_check_input() {
  if (!document.community_insert_form.title.value) {
    alert('제목을 입력하세요');
    document.community_insert_form.title.focus();
    return;
  }
  if (!document.community_insert_form.content.value) {
    alert('내용을 입력하세요');
    document.community_insert_form.content.focus();
    return;
  }
  document.community_insert_form.submit();
}

function community_reset() {
  document.community_insert_form.title.value = '';
  document.community_insert_form.content.value = '';
  document.community_insert_form.upfile.value = '';
}
