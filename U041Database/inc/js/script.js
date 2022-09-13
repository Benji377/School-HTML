function questionLink(questionNumber) {
    console.log(document.questionForm.questionNumber.value);
    document.questionForm.questionNumber.value = questionNumber;
    console.log(document.questionForm.questionNumber.value);
    console.log("STOP");
    document.questionForm.submit();
    return false;
}