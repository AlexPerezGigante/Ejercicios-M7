$(document).ready(function () {
    $("form").submit(function (event) {
        console.log(event)
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
       
      var formData = {
        check: $("#check").prop("checked"),
        prompt: $("#prompt").val(),
        name: [],
        value: []
        
      };
      $('input[name="name[]"]').each(function () { 
          formData.name.push($(this).val());
      });

      $('input[name="value[]"]').each(function () {
        if( $(this).prop("type") == 'checkbox'){
          console.log($(this))
          formData.value.push($(this).prop("checked"));
        }else{
          formData.value.push($(this).val());
        }
        
      });

      
      

      $.ajax({
        type: "POST",
        url: "process.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        
        const input = `
        <div id="command-group" class="form-group">
        <label for="prompt"></label>
        <input
          type="text"
          class="form-control"
          id="prompt"
          name="prompt"
          placeholder="prompt"
          
        />
      </div>
      <button type="submit" class="btn btn-success">
          Submit
        </button>
        `

       


        console.log(formData)
        console.log(data);
        if (!data.success) {
            if (data.errors.prompt) {
              $("#name-group").addClass("has-error");
              $("#name-group").append(
                '<div class="help-block">' + data.errors.prompt + "</div>"
              );
            }
    
            // if (data.errors.email) {
            //   $("#email-group").addClass("has-error");
            //   $("#email-group").append(
            //     '<div class="help-block">' + data.errors.email + "</div>"
            //   );
            // }
    
            // if (data.errors.superheroAlias) {
            //   $("#superhero-group").addClass("has-error");
            //   $("#superhero-group").append(
            //     '<div class="help-block">' + data.errors.superheroAlias + "</div>"
            //   );
            // }
          } else {

            if(data.create){

              let html = `
              <form action="process.php" method="POST">
              <div id="form-group" class="form-group">
              <div id="command-group" class="form-group">
          <label for="prompt"></label>
              <input
                type="text"
                class="form-control "
                id="prompt"
                name="prompt"
                value="${data.prompt}"/>
                <table>
                    <tr>
                    <th>Column Name</th>
                    <th>Type</th>
                </tr>
                `
                data.create.map((element)=>{
                  console.log(data.create)
                  html+=element
                })

                
                html+=`
                </table>
                <input
                type="checkbox"
                id="check"
                name="check"
                value=1
                class=""
                />

                <button type="submit" class="btn btn-success">
          Submit
        </button>`

        $("form").html(
          '<div class="alert alert-success">' + data.message + "</div>" + html 
        );
                
            }

            if(data.select){
              console.log(data.select.contructor)
              let html = `
              
                <table>
                    `

              
              if(!Array.isArray(data.select)){
                html+=`<tr>`
                Object.keys(data.select).forEach((key)=>{
                  console.log(key)
                  html+=`<th>${key}</th>`
                })
                html+=`</tr><tr>`
                Object.values(data.select).forEach((str)=>{
                  html += `<td>${str}</td>`
                })
                html+=`</tr>`
              }else{
              
                    html+= `<tr>`
                    Object.keys(data.select[0]).forEach((key)=>{
                      console.log(key)
                      html+=`<th>${key}</th>`
                    })
                      
                    
                    html+=`</tr>`
                    data.select.map((element, index)=>{
                      html += `<tr>`
                        console.log()
                        console.log(element)
                        Object.values(element).forEach((str)=>{
                            html += `<td>${str}</td>`
                          })
                      html +=`</tr>`
                    }) 
                  }
              html +=`
                </table>
              `
              
              $("form").html(
                input
              )
            $(".res").html(
              '<div class="alert alert-success">' + data.message + "</div>" + html 
            );

            }

            if(data.delete){
              
              let form = 
              `<form action="process.php" method="POST">
              <div id="form-group" class="form-group">
              <div id="command-group" class="form-group">
          <label for="prompt"></label>
              <input
                type="text"
                class="form-control "
                id="prompt"
                name="prompt"
                value="${data.prompt}"
                `

                form+=`
              />
              <table>
              <tr>`
              Object.keys(data.delete).forEach((key)=>{
                console.log(key)
                form+=`<th>${key}</th>`
              })
              form+=`</tr><tr>`
              Object.values(data.delete).forEach((str)=>{
                form += `<td>${str}</td>`
              })
              form+=`</tr>
              </table>
              <label for="check">Sure?</label>
              <input
                type="checkbox"
                id="check"
                name="check"
                value=1
                class=""
              />

              <button type="submit" class="btn btn-primary">
              Submit
              </button>
              
              </div>
              </form>`

              $("form").html(
                '<div class="alert alert-success">' + data.message + "</div>" + form
              );
              $(".res").html(
                ''
              );
            }

            if(data.checkDelete){
              $("form").html(
                input
              );
              $(".res").html(
                '<div class="alert alert-success">' + data.message + " element " + data.checkDelete + " deleted</div>" 
              );
            }

            if(data.update){
              data.inputs= event
              console.log(data.inputs)
              let form = 
              `<form action="process.php" method="POST">
              <div id="form-group" class="form-group">
              <div id="command-group" class="form-group">
          <label for="prompt"></label>
              <input
                type="text"
                class="form-control "
                id="prompt"
                name="prompt"
                value="${data.prompt}"
                `

                form+=`
              />
              <table>
              <tr>`
              Object.keys(data.update).forEach((key, index)=>{
                
                form+=`<th>${key}</th>
                <input name="name[]" id="name${index}" type="hidden" value="${key}"/>`
              })
              form+=`</tr><tr>`
              
              Object.values(data.update).forEach((str, index)=>{
                if(isNaN(str)){
                  
                  
                    form += `<td><input name="value[]" id="value${index}" type="text" value="${str}"/></td>`
                  
                  
                }else{
                  if(typeof str == 'boolean'){
                    console.log(str)
                    if(str==true){
                      form += `<td><input name="value[]" id="value${index}" type="checkbox" value="${str}" checked/></td> `
                    }else{
                      form += `<td><input name="value[]" id="value${index}" type="checkbox" value="${str}"/></td>`
                    }
                    
                  }else{
                    if(index==0){
                      form += `<td>${str}</td>`
                    }else{
                      form += `<td><input name="value[]" id="value${index}" type="number" value=${str}></td>`
                    }
                  
                  }
                }
                
              })
              form+=`</tr>
              </table>
              <label for="check">Sure?</label>
              <input
                type="checkbox"
                id="check"
                name="check"
                value=1
                class=""
              />

              <button type="submit" class="btn btn-primary">
              Submit
              </button>
              
              </div>
              </form>`

              $("form").html(
                '<div class="alert alert-success">' + data.message + "</div>" + form
              );
              $(".res").html(
                ''
              );
            }

            if(data.checkForm){
              $("form").html(
                input
              );
              $(".res").html(
                '<div class="alert alert-success">' + data.message + " element " + data.checkForm + " updated</div>" 
              );
              
            }

            if(data.cancelar){
              $("form").html(
                input
              );
              $(".res").html(
                ''
              );
            }


          }

      })
      .fail(function (data) {
        console.log(data.responseText)
        $(".res").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
  
      event.preventDefault();
    });
  });

