@extends('layouts.master')

@section('headclass')

@stop

@section('content')

<div class="row">
    <div class="span2">
        <ul id="docs-navbar" class="nav nav-list navbar affix" data-spy="affix">
            <li class="nav-header">API Documentation</li>
            <li><a href="#overview">Overview</a></li>
            <li><a href="#authentication">Authentication</a></li>
            <li class="nav-header">Files</li>
            <li><a href="#file-list">List</a></li>
            <li><a href="#file-info">Info</a></li>
            <li><a href="#file-upload">Upload</a></li>
            <li><a href="#file-update">Update</a></li>
            <li><a href="#file-delete">Delete</a></li>
            <li class="nav-header">Folders</li>
            <li><a href="#folder-list">List</a></li>
            <li><a href="#folder-info">Info</a></li>
            <li><a href="#folder-create">Create</a></li>
            <li><a href="#folder-update">Update</a></li>
            <li><a href="#folder-delete">Delete</a></li>
        </ul>
    </div>
    <div class="span10" data-spy="scroll" data-target="#docs-navbar" data-offset="50">
        <h2 class="title-divider"><span>Storage <span class="de-em">API</span></span>
            <small>This documentation relates to v2 of our API, for v1 please visit
                <a href="/docs/api/v1">/docs/api/v1</a></small>
        </h2>
        <section id="overview">
            <h2>API Documentation</h2>

            <p>Our API is very RESTful, meaning everything is accessed via HEAD, GET, POST, DELETE, etc. We also use a
                simple key based authing system for the api, to track requests and verify privs.</p>

            <h3>What is CFS?</h3>

            <p>CFS is quite simply a Cloud File System. A new way to work with the files you use and work with on
                Storage.
                Instead of just working with a random, non descriptive URL.</p>

            <p>Our goals for CFS are to be a complete filesystem, for the web.</p>
        </section>
        <section id="authentication">
            <h4>Sending Authentication Information</h4>

            <p>You'll first need to get a key from http://getstorage.net/, after that you'll be able to use your key
                either
                via a query paramater or via a request header. Examples are shown below:</p>

            <p>Query String: <code>GET api.stor.ag/v2/status?key=yourkey</code> <br>
                Request Header: <code>Storage-Key: yourkey</code>
                <br></p>
        </section>

        <hr>

        <section id="file">
            <h3>Files</h3>

            <h4 id="file-list">Getting a List of Files</h4>

            <p>See <a href="#folder-list">Folder - List</a></p>

            <p><br></p>

            <h4 id="file-info">Get Info About a File</h4>

            <p>This will return all public information we have on the requested file. </p>

            <pre>HEAD api.stor.ag/v2/cfs/yourFolder/yourFile.txt</pre>

            <p><br></p>

            <h4 id="file-upload">Upload a File</h4>

            <p>This one is more complex, but only because we want to support tons of methods for uploading files. This
                method currently only supports multipart, as it provides us with all info we need to process your
                request.
                The following are required in the multipart request: file, filename and mime. </p>

            <pre>POST api.stor.ag/v2/cfs</pre>

            <p>Optional Params:</p>

            <ul>
                <li>folder (string) - This will basically provide a path for the file, if the folder doesn't exist,
                    we'll
                    make it.
                </li>
                <li>mime (string) - You can specify a different mime type for serving the file.</li>
                <li>secure (boolean) - Optionally force this file to be served via https</li>
                <li>private (boolean) - More support will be added for this in the future, for now you can assume it'll
                    control file visibility
                </li>
            </ul>

            <p>Your can also send these paramaters via a HTTP Request Header, by prefixing the name with CFS- (for
                example
                CFS-folder, CFS-mime)</p>

            <p><br></p>

            <h4 id="file-update">Update a File</h4>

            <p>This allows you to send a new version of the file or change the settings, in the future we'll support
                automatic patching via PATCH. Same params/requirements as Uploading a File. File is optional if you're
                just
                updating settings.</p>

            <pre>PUT api.stor.ag/v2/cfs/yourFolder/yourFile.txt</pre>

            <p><br></p>

            <h4 id="file-delete">Delete a File</h4>

            <pre>DELETE api.stor.ag/v2/cfs/yourFolder/yourFile.txt</pre>
        </section>

        <hr>

        <section id="folder">
            <h3>Folders</h3>

            <h4 id="folder-list">List the Contents of a Folder</h4>

            <p>Calling this will recursively list the contents of the specified file, defaulting to listing everything
                the key owns. </p>
            <pre>GET api.stor.ag/v2/cfs/ - List All Files/Folders</pre>
            <pre>GET api.stor.ag/v2/cfs/aSpecificFolder - List All Files/Folders inside aSpecificFolder</pre>

            <p>Optional Params:</p>
            <ul>
                <li>recursive (boolean) defaults to true</li>
            </ul>

            <br>

            <h4 id="folder-info">Get Information About a Folder</h4>

            <p>Get information like folder size (the size of everything inside of the folder, folders are 0 bytes).</p>
            <pre>HEAD api.stor.ag/v2/cfs/aSpecificFolder</pre>

            <br>

            <h4 id="folder-create">Create a Folder</h4>

            <p>Get information like folder size (the size of everything inside of the folder, folders are 0 bytes).</p>
            <pre>POST api.stor.ag/v2/cfs - Create a folder in root</pre>
            <pre>POST api.stor.ag/v2/cfs/yourRootFolder/anotherFolder - Create a new subfolder</pre>
            <p>Required Params:</p>
            <ul>
                <li>name (string) - The name of the folder</li>
            </ul>

            <br>

            <h4 id="folder-update">Update a Folder</h4>

            <p>Change a folders name or location.</p>
            <pre>PUT api.stor.ag/v2/cfs/yourFolder</pre>
            <p>Required Params:</p>
            <ul>
                <li>name (string) - The new name of the folder</li>
                <li>location (string) - The new location of the folder (example: subfolder/foo)</li>
            </ul>

            <br>

            <h4 id="folder-delete">Delete a Folder</h4>

            <p>This will allow you to delete a folder from our filesystem. Please note if files exist inside the folder
                you'll need to set the force param.</p>
            <pre>DELETE api.stor.ag/v2/cfs/yourFolder</pre>
            <p>Required Params:</p>
            <ul>
                <li>force (boolean) - Delete ALL contents of the folder along with the folder</li>
            </ul>

        </section>

        <br><br><br><br>
    </div>
</div>

@stop
