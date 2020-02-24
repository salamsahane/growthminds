tinymce.init({
  selector: "textarea#topicContent",
  plugins:
    "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen imagetools image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
  imagetools_cors_hosts: ["picsum.photos"],
  menubar: "file edit view insert format tools table help",
  toolbar:
    "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: [
    "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
    "//www.tiny.cloud/css/codepen.min.css"
  ],
  link_list: [
    { title: "My page 1", value: "http://www.tinymce.com" },
    { title: "My page 2", value: "http://www.moxiecode.com" }
  ],
  importcss_append: true,
  height: 400,
  image_title: true,
  automatic_uploads: true,
  file_picker_types: 'image',
  file_picker_callback: function(callback, value, meta) {
    var input = document.createElement("input");
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.onchange = function() {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function() {
            var id = 'blobid' + (new Date()).getTime();
            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            callback(blobInfo.blobUri(), {title: file.name});
        };
        reader.readAsDataURL(file);
    };
    input.click();
  },
  templates: [
    {
      title: "New Table",
      description: "creates a new table",
      content:
        '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
    },
    {
      title: "Starting my story",
      description: "A cure for writers block",
      content: "Once upon a time..."
    },
    {
      title: "New list with dates",
      description: "New List with dates",
      content:
        '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
    }
  ],
  template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
  template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
  height: 400,
  image_caption: true,
  quickbars_selection_toolbar:
    "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_drawer: "sliding",
  contextmenu: "link image imagetools table",
  setup: (editor) => { // Apply the focus effect
    editor.on('init', () => {
      editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
    });
    editor.on('focus', () => {
      editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(0, 123, 255, .25)",
      editor.getContainer().style.borderColor="#80bdff"
    });
    editor.on('blur', () => {
      editor.getContainer().style.boxShadow="",
      editor.getContainer().style.borderColor=""
    });
    editor.on('FullscreenStateChanged', (e) => {
      if(e.state == true){
        document.querySelector(".navbar").style.visibility="hidden";
        document.querySelector(".mdk-header").style.zIndex="-1";
      }else{
        document.querySelector(".navbar").style.visibility="visible";
        document.querySelector(".mdk-header").style.zIndex="1";
      }
    })
  }
});