$(document).ready(function () {
    var inputPreview = $(".input-preview"),
      input = $(".input");
  
    TweenMax.set(input, {
      scale: 1.2,
      alpha: 0
    });
  
    inputPreview.on("click", function () {
      var that = $(this);
  
      that.toggleClass("active");
  
      if (that.hasClass("active")) {
        TweenMax.staggerTo(
          input,
          1.25,
          {
            scale: 1,
            alpha: 1,
            ease: Elastic.easeOut
          },
          0.1
        );
      } else {
        TweenMax.staggerTo(
          input,
          1,
          {
            scale: 1.2,
            alpha: 0,
            ease: Elastic.easeOut
          },
          0.1
        );
      }
    });
  
    input.on("click", function () {
      var tlInput = new TimelineMax({
        onComplete: done
      });
  
      var that = $(this),
        siblings = that.siblings(".input"),
        data = that.data("val"),
        top = that.css("top");
  
      siblings.removeClass("active");
  
      tlInput
        .to(siblings, 0.25, {
          alpha: 0
        })
        .to(that, 0.25, {
          scale: 1.2
        })
        .to(that, 0.25, {
          top: 0
        })
        .set(inputPreview, {
          display: "none"
        })
        .to(that, 0.25, {
          scale: 1
        })
        .to(that, 0.5, {
          backgroundColor: "#1D77EF"
        })
        .set(inputPreview, {
          text: data,
          display: "block"
        })
        .to(that, 0.25, {
          alpha: 0
        });
  
      function done() {
        inputPreview.removeClass("active");
        that.css("top", top).addClass("active");
  
        TweenMax.set(input, {
          scale: 1.2,
          alpha: 0,
          backgroundColor: "#fff"
        });
      }
    });
  
    // copy
    balapaCop("Select Input Interaction", "rgba(255,255,255,.5)");
  });

  const config = {
    type: 'doughnut',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Chart.js Doughnut Chart'
        }
      }
    },
  };



