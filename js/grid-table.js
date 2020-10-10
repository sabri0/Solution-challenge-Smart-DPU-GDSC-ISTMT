$(document).ready(function(){
  $(".patient").Grid({
    search: true,
    pagination: true,
    language: {
      'search': {
        'placeholder': '🔍 Trouvez Patient...'
      },
      'pagination': {
        'previous': '⬅️',
        'next': '➡️',
        'showing': 'Affichage',
        'results': () => 'Patients'
      }
    }
  });
});
