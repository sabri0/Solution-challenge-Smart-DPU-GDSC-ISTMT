$(document).ready(function(){
  $(".patient").Grid({
    search: true,
    sort: true,
    language: {
      'search': {
        'placeholder': '🔍 Trouvez Patient...'
      },
     
    }
    
  });
  $('.patient').infiniteScroll({
    path: getPenPath,
    append: '.item',
    status: '.page-load-status',
  });
  
  //-------------------------------------//
  // hack CodePen to load pens as pages
  
  function getPenPath() {
    const nextPenSlugs = [
      '3d9a3b8092ebcf9bc4a72672b81df1ac',
      '2cde50c59ea73c47aec5bd26343ce287',
      'd83110c5f71ea23ba5800b6b1a4a95c4',
    ];
  
    let slug = nextPenSlugs[ this.loadCount ];
    if ( slug ) return `/desandro/debug/${slug}`;
  }
});
