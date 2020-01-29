
    window.jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
        {$Duration:800,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:800,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$ZIndex:-10,$Shift:-60}},
        {$Duration:800,x:-0.2,$Delay:40,$Cols:12,$During:{$Left:[0.4,0.6]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5},$Brother:{$Duration:800,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:1028,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Round:{$Top:0.5},$Shift:-200}},
        {$Duration:800,x:0.2,$Delay:40,$Cols:12,$During:{$Left:[0.4,0.6]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5},$Brother:{$Duration:800,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:1028,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Round:{$Top:0.5},$Shift:-200}},
        {$Duration:1200,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}},
        {$Duration:1200,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
        {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
        {$Duration:1000,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
        {$Duration:1200,x:4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
        {$Duration:1000,y:4,$Zoom:11,$Easing:{$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:50,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:50,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:80,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:50,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:2049},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:50,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:50,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:80,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Clip:$Jease$.$InSine}},
        {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$Easing:$Jease$.$InSine},
        {$Duration:500,x:-1,$Delay:40,$Cols:10,$Rows:5,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:500,y:1,$Delay:40,$Cols:10,$Rows:5,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:-1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:513,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:500,x:1,y:-1,$Delay:40,$Cols:10,$Rows:5,$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:-1,y:-1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:1028,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:-1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,y:1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:1,y:1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,y:1,$Delay:12,$Cols:10,$Rows:5,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:264,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:500,x:1,$Delay:40,$Cols:10,$Rows:5,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:500,y:-1,$Delay:40,$Cols:10,$Rows:5,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:-1,y:1,$Delay:40,$Cols:10,$Rows:5,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:1,$Delay:12,$Cols:10,$Rows:5,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:514,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,y:-1,$Delay:12,$Cols:10,$Rows:5,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:1,y:1,$Delay:12,$Cols:10,$Rows:5,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:1,$Delay:12,$Cols:10,$Rows:5,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,y:-1,$Delay:12,$Cols:10,$Rows:5,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:600,x:-1,y:-1,$Delay:12,$Cols:10,$Rows:5,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
        {$Duration:1000,x:-0.2,$Delay:20,$Cols:16,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
        {$Duration:400,$Delay:50,$Cols:10,$Clip:2,$Formation:$JssorSlideshowFormations$.$FormationStraight},
        {$Duration:400,$Delay:40,$Cols:16,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Opacity:2,$Assembly:260},
        {$Duration:400,$Cols:8,$Clip:1,$Move:true},
        {$Duration:400,$Rows:6,$Clip:4,$Move:true},
        {$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$Linear},$Round:{$Left:0.8,$Top:2.5}},
        {$Duration:1200,x:-1,y:-1,$Cols:6,$Rows:6,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Clip:[0,0.2]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Clip:$Jease$.$Swing},$ScaleClip:0.5},
        {$Duration:4000,x:-1,y:0.45,$Delay:80,$Cols:12,$Opacity:2,$Clip:15,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.15]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$Jease$.$Linear,$Top:$Jease$.$OutWave,$Clip:$Jease$.$OutQuad},$ScaleClip:0.7,$Round:{$Top:4}}
        ];

        var jssor_1_options = {
        $AutoPlay: 1,
        $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
        },
        $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $SpacingX: 5,
            $SpacingY: 5
        }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 3000;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth - 35;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };