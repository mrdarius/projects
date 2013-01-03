package com.activity;


import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Calendar;

import service.DateNavService;
import service.EntryService;

import model.entry;
import android.app.Activity;
import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.os.Environment;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;



public class EntryActivity extends Activity {
	
	private static final int CAMERA_PIC_REQUEST = 2500;
	private EditText e1;
	private EditText e2;
	private entry entry;
	private EntryActivity activity;

	@Override
	protected void onCreate(Bundle savedInstanceState) {

		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.entylayout);
		Button bCamera = (Button)findViewById(R.id.camera);
		Button bSave = (Button) findViewById(R.id.save);	
		
		e1 = (EditText) findViewById(R.id.editText2);
		e2 = (EditText) findViewById(R.id.editText1);
		
		
		activity = this;
			
		
        bCamera.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
            	
                 Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                 startActivityForResult(cameraIntent, CAMERA_PIC_REQUEST);
            }
        });
        
        bSave.setOnClickListener(new View.OnClickListener() {
			
			private String tag = "EntryActivity";

			public void onClick(View v) {

				EntryService es = new EntryService(activity);	
				DateNavService dns = DateNavService.getInstance();
				
				Log.d(tag, "Clicked");
				
				
				try {
					
						while(true) {
							Log.d(tag, "Inserting...");
							
							String fname = e2.getText().toString();
							String indiphoto = e1.getText().toString();
							
							if (fname.equals("")) {
								Toast.makeText(activity, R.string.err_nf, Toast.LENGTH_LONG).show();
								Log.d(tag, "Empty name");
								break;
							}
							
							if (indiphoto.equals(R.string.no_photo)) {
								Toast.makeText(activity, R.string.err_cph, Toast.LENGTH_LONG).show();
						
								break;
							}
														
							long dtMili = System.currentTimeMillis();	
							String iname = fname + dtMili + ".jpg";
							
							entry.setName(fname);
							entry.setIname(iname);
							entry.setEyear( dns.getDate().getYear() );
							entry.setEmonth(dns.getDate().getMonth() );
							entry.setEday( dns.getDate().getDay() );
							Intent i = new Intent(activity, EntriesActivity.class);
							startActivity(i);
							
							es.save(entry);	
							
							break;
							
							
					}
										
					
					
				} catch (IOException e) {
					// TODO Auto-generated catch block
					Log.d(tag, e.getMessage());
				}
				
			}
		});
        
	}
	
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == CAMERA_PIC_REQUEST) {
        	
        	e1.setText(R.string.photo_ok);        	        	
            entry.setImage((Bitmap) data.getExtras().get("data"));              
        }
    }	
}
