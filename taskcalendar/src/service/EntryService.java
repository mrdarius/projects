package service;


import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;

import com.activity.EntryActivity;


import model.entry;

import adapter.PhotoDBAdapter;
import android.content.Context;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.os.Environment;
import android.util.Log;

public class EntryService {
		
	
	private entry entry;
	private ArrayList<model.entry> entries;
	private Context Context;

	public EntryService(Context ctx) {
		
		Context = ctx;		
	}

	public void save(entry e) throws IOException {
		
		
		PhotoDBAdapter db = new PhotoDBAdapter(Context);
		db.open();
		db.insertPhoto(e.getName(), e.getIname(), e.getEyear(), e.getEmonth(), e.getEday() );			
		saveBitmapToCard(e.getImage(), e.getIname() );		
		db.close();	
	}
	

	public void saveBitmapToCard(Bitmap bitmap, String iname) throws IOException {
		
		ByteArrayOutputStream bytes = new ByteArrayOutputStream();
		bitmap.compress(Bitmap.CompressFormat.JPEG, 40, bytes);
		
		File f = new File(Environment.getExternalStorageDirectory()
		                        + File.separator + iname);
		f.createNewFile();

		FileOutputStream fo = new FileOutputStream(f);
		fo.write(bytes.toByteArray());
		fo.close();		
	}
	
	public ArrayList<entry> getAllEntries(){
		
		PhotoDBAdapter db = new PhotoDBAdapter(Context);
		db.open();
		Cursor photos = db.getAll();
		
		entries = new ArrayList<entry>();
		
		while(photos.moveToNext()) {
			
			
			int id = photos.getInt(0);
			int eyear = photos.getInt(1);
			int emonth = photos.getInt(2);
			int eday = photos.getInt(3);	
			String fname = photos.getString(4);
			String iname = photos.getString(5);			
			
			
			entry = new entry(id, eyear, emonth, eday, fname, iname);
			
			Log.d("EntryService", "Entry: " + eyear + "-" + emonth + "-" + eday + " | " + fname + "->" + iname);
			
			entries.add(entry);
		}
		
		return entries;
		
	}
}
