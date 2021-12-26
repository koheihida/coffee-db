const quiz = [
  {
    question: 'どんな気分になるコーヒーを選びたい？？',
    answers: [ '落ち着く', '元気になる']
  }, {
    question: '穏やかな味が好き？',
    answers: [ '穏やかがいい', '力強い方がいい']
  }, {
    question: '果実味は強い方がいい？',
    answers: [ '穏やかがいい', '強い方がいい']
  },{
    question: 'どっちが好き？',
    answers: [ '華やか系', '甘さしっかり系']
  },{
    question: '果実味が好き？',
    answers: [ '苦手', '好き']
  },{
    question: '軽い味わいが好き？',
    answers: [ '軽い方が好き', '軽すぎない方が好き']
  },{
    question: 'シトラス系とベリー系どっちの香りが好き？',
    answers: [ 'シトラス系', 'ベリー系']
  }

];

const $window = window;
const $doc = document;
const $question = $doc.getElementById('js-question');
const $buttons = $doc.querySelectorAll('.btn');

const quizLen = quiz.length;
let quizCount = 0;
let score = 0;

const init = () => {
  $question.textContent = quiz[quizCount].question;

  const buttonLen = $buttons.length;
  let btnIndex = 0;

  while(btnIndex < buttonLen){
    $buttons[btnIndex].textContent = quiz[quizCount].answers[btnIndex];
    btnIndex++;
  }
};

const goToNext = () => {

  if(quizCount < quizLen){
    init(quizCount);
  } else {

    window.location.href = '/load';
  }
};

const judge = (elm) => {
  if(elm.textContent === quiz[0].answers[0]){
    quizCount++;
  } else if (elm.textContent === quiz[0].answers[1]){
    quizCount += 2;
  } else if (elm.textContent === quiz[1].answers[0]){
    quizCount += 2;
  } else if (elm.textContent === quiz[1].answers[1]){
    quizCount += 3;
  } else if (elm.textContent === quiz[2].answers[0]){
    quizCount += 3;
  }else if (elm.textContent === quiz[2].answers[1]){
    quizCount += 4
  }else if (elm.textContent === quiz[3].answers[0]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "ホンジュラス",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href = '/load')
    });
  }else if (elm.textContent === quiz[3].answers[1]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "グァテマラ",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[4].answers[0]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "ブラジル",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[4].answers[1]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "コロンビア",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[5].answers[0]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "エチオピア",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[5].answers[1]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "ルワンダ",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[6].answers[0]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "ケニア",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load')
    });
  }else if (elm.textContent === quiz[6].answers[1]){
    swal({
      text: "coffee memoに飲んだコーヒーを記録してね！！",
      title: "エチオピア　ナチュラルプロセス",
      icon: "success",
    })
    .then((value) => {
      open(window.location.href ='/load');
    });
  }
  goToNext();
};


const showEnd = (elm) => {
  $question.textContent = 'hidden';
  const $items = $doc.getElementById('js-items');
  $items.style.visibility = 'hidden';
  open(window.location.href = '/load');
};

init();

let answersIndex = 0;
let answersLen = quiz[quizCount].answers.length;

while(answersIndex < answersLen){
  $buttons[answersIndex].addEventListener('click', (e) => {
    judge(e.target);
  });
  answersIndex++;
}
