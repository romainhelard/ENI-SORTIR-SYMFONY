console.log('Konami EASTER EGG')

// a key map of allowed keys
var allowedKeys = {
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    65: 'a',
    66: 'b'
};

  // the 'official' Konami Code sequence
var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];

  // a variable to remember the 'position' the user has reached so far.
var konamiCodePosition = 0;

  // add keydown event listener
document.addEventListener('keydown', function(e) {
    // get the value of the key code from the key map
    var key = allowedKeys[e.keyCode];
    // get the value of the required key from the konami code
    var requiredKey = konamiCode[konamiCodePosition];

    // compare the key with the required key
    if (key == requiredKey) {

      // move to the next key in the konami code sequence
    konamiCodePosition++;

      // if the last key is reached, activate cheats
    if (konamiCodePosition == konamiCode.length) {
        activateCheats();
        konamiCodePosition = 0;
    }
    } else {
    konamiCodePosition = 0;
    }
});

function activateCheats() {
    alert("MODE COCO ACTIVATED");
    document.body.style.backgroundColor = "pink";

    // NEIGE ROSE
    const Snow = (canvas, count, options) => {
      const ctx = canvas.getContext('2d')
      const snowflakes = []
  
      const add = item => snowflakes.push(item(canvas))
    
      const update = () => _.forEach(snowflakes, el => el.update())
  
      const resize = () => {
        ctx.canvas.width = canvas.offsetWidth
        ctx.canvas.height = canvas.offsetHeight
    
        _.forEach(snowflakes, el => el.resized())
      }
    
      const draw = () => {
        ctx.clearRect(0, 0, canvas.offsetWidth, canvas.offsetHeight)
        _.forEach(snowflakes, el => el.draw())
      }
      
      const events = () => {
        window.addEventListener('resize', resize)
      }
    
      const loop = () => {
        draw()
        update()
        animFrame(loop)
      }
    
      const init = () => {
        _.times(count, () => add(canvas => SnowItem(canvas, null, options)))
        events()
        loop()
      }
    
      init(count)
      resize()
    
      return { add, resize }
    }
    
    const defaultOptions = {
      color: 'orange',
      radius: [0.5, 5.0],
      speed: [1, 5],
      wind: [-0.5, 3.0]
    }
    
    const SnowItem = (canvas, drawFn = null, opts) => {
      const options = { ...defaultOptions, ...opts }
      const { radius, speed, wind, color } = options
      const params = {
        color,
        x: _.random(0, canvas.offsetWidth),
        y: _.random(-canvas.offsetHeight, 0),
        radius: _.random(...radius),
        speed: _.random(...speed),
        wind: _.random(...wind),
        isResized: false
      }
      const ctx = canvas.getContext('2d')
      
      const updateData = () => {
        params.x = _.random(0, canvas.offsetWidth)
        params.y = _.random(-canvas.offsetHeight, 0)
      }
      
      const resized = () => params.isResized = true
    
      const drawDefault = () => {
        ctx.beginPath()
        ctx.arc(params.x, params.y, params.radius, 0, 2 * Math.PI)
        ctx.fillStyle = params.color
        ctx.fill()
        ctx.closePath()
      }
    
      const draw = drawFn
        ? () => drawFn(ctx, params)
        : drawDefault
    
      const translate = () => {
        params.y += params.speed
        params.x += params.wind
      }
    
      const onDown = () => {
        if (params.y < canvas.offsetHeight) return
    
        if (params.isResized) {
          updateData()
          params.isResized = false
        } else {
          params.y = 0
          params.x = _.random(0, canvas.offsetWidth)
        }
      }
    
      const update = () => {
        translate()
        onDown()
      }
    
      return {
        update,
        resized,
        draw
      }
    }
    
    const el = document.querySelector('.container')
    const wrapper = document.querySelector('body')
    const canvas = document.getElementById('snow')
    
    const animFrame = window.requestAnimationFrame ||
                      window.mozRequestAnimationFrame ||
                      window.webkitRequestAnimationFrame ||
                      window.msRequestAnimationFrame
    
    Snow(canvas, 150, { color: 'dark' })
}