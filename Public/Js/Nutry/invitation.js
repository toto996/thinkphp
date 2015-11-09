/**
 * Created by ToTo on 2015/10/27.
 */

$(document).ready(function() {
    $('#fullpage').fullpage({
        afterLoad: function(anchorLink, index){
            switch(index) {
                case 1:
                    move('#imgSun')
                        .add('margin-bottom', 150)
                        .duration('2s')
                        .end(function(){
                            move('#divTop')
                                .set('opacity', 1)
                                .end(function(){
                                    move('#imgSyrup')
                                        .set('opacity', 1)
                                        .rotate(360)
                                        .end();
                            });
                        }
                    );
                    break;
                case 2:
                     move('#section2 #p1').set('right', '0').end(function(){
                         move('#section2 #p2').set('right', '0').end(function(){
                             move('#section2 #p3').set('right', '0').end(function(){
                                 move('#section2 #p4').set('right', '0').end();
                             });
                         });
                     });
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;
            }
        },
        onLeave: function(index, nextIndex, direction){
            switch(index) {
                case 1:
                    move('#imgSun').
                        sub('margin-bottom', 150)
                        .end();
                    move('#divTop')
                        .set('opacity', 0)
                        .end();
                    move('#imgSyrup')
                        .set('opacity', 0)
                        .rotate(-360)
                        .end();
                    break;
                case 2:
                    move('#section2 #p1').set('right', '-100%').end();
                    move('#section2 #p2').set('right', '-100%').end();
                    move('#section2 #p3').set('right', '-100%').end();
                    move('#section2 #p4').set('right', '-100%').end();
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;
            }
        }
    });
});
