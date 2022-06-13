function questionLink(questionNumber) {
    document.questionForm.questionNumber.value = questionNumber;
    document.questionForm.submit();
    return false;
}