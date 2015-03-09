game.PlayerEntity = me.Entity.extend({
    init: function (x, y, settings) {
        this._super(me.Entity, 'init', [x, y, {
            image: "player"  ,
            // the 'width' and 'height' are telling the screen how much space to preserve 
            width: 64,
            height: 64,
            // telling us what the size of the image its using is
            spritewidth: "64",
            spriteheight: "64",
            getShape: function() {
                return(new me.Rect(0, 0, 64, 64)).toPolygon();
            }
        }]);
    },
    
    update: function() {
        
    }
});