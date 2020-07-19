
<template>
    <div class="col-md-12 mt-5" style="margin-top: 5%">

        <div class="modal fade" id="alertErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title w-100 text-center" id="myModalLabel">Error</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <div class="text-center">
                  <i class="fas fa-times  fa-4x mb-3 animated rotateIn"></i>
                  <h6 class="text-danger" id="controllerError">Something is not right. Check that you have the required file tyoe and the size is within the acceptable range. <br>If this error persists please contact Swiftpay on 0742968713</h6>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="alertSuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title w-100 text-center" id="myModalLabel">Success</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <div class="text-center">
                  <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                  <h6 id="controllerSuccess">Well Done. Wasn't that easy. </h6>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <form>
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Caption</label>
              <input type="text" class="form-control" id="caption" name="caption" aria-describedby="Page title" placeholder="Caption" v-model="caption">
            </div>
          </div>
           <vuedropzone ref="myVueDropzone" id="dropzone" name="image"
                        :options="dropzoneOptions"  
                        v-on:vdropzone-sending="sendingEvent"
                        v-on:vdropzone-error="vdropzoneerror"
                        v-on:vdropzone-success="vdropzonesuccess">       
            </vuedropzone> 
        </form>
    </div>
</template>

<script>
import vuedropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        components: {
            vuedropzone
        },
        mounted() {
                console.log('drop');
            },
        data() {
            return {
                dropzoneOptions: {
                url: '/jbhjbhjbjvuedrophagcxsiuw89e4yry',
                thumbnailWidth: 150,
                maxFilesize: 20,
                headers: { "My-Awesome-Header": "Upload to Swiftpay CLoud" },
                thumbnailWidth: 200,
                addRemoveLinks: true,
                dictDefaultMessage: '<i style="font-size: 70px" class="fa fa-cloud-upload-alt"></i> <br>Upload to Swiftpay cloud 0742 968 713 '
            },
              caption: '',
            };
        },
        props: [],

        methods: {
            sendingEvent (file, xhr, formData) {
              formData.append(this.caption );
            },
          vdropzoneerror(file, message, xhr) {
            $('#alertErrorModal').modal({backdrop: false});
            return
          },
          vdropzonesuccess(file, response) {
            $('#alertSuccessModal').modal({backdrop: false});
          },
        }
    }
</script>