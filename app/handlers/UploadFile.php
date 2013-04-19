<?php

class UploadFile {
    
    
    public function fire($job, $data) 
    {
        $object = Object::where('name', $data['name'])->first();

        // Take file
        $path = base_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.$object->name;

        $original = ($object->original != null ? $object->original : $object->name);

        // Upload to S3
        $s3 = App::make('aws')->get('s3');
        $s3->putObject(array(
            'Bucket' => 'storag',
            'Key' => $object->name,
            'SourceFile' => $path,
            'ContentType' => $object->mime,
            'ContentDisposition' => 'inline; filename="' . $original . '"'
        ));

        $object->s3 = true;
        $object->save();


        $job->delete();
    }


}
