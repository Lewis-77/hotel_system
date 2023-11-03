// FAQ dropdown

function toggleAnswer(element) {
    const answer = element.querySelector('.faq-answer');
    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
}

//FAQ icon animation
$(document).ready(function () {
    $(".faq-icon-collape").click(function () {
        var target = $(this).data("target");
        $(target).collapse("toggle");
        $(this).find('.fa-icon').toggleClass('rotate-icon');
    });
});