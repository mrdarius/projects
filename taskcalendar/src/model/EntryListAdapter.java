package model;


import java.io.File;
import java.io.FileInputStream;
import java.util.ArrayList;

import com.activity.R;


import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Matrix;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class EntryListAdapter extends BaseAdapter {

	ArrayList<entry> entries;
	Context context;
	
	public EntryListAdapter(Context context, ArrayList <entry> entries) {
		this.context = context;
		this.entries = entries;
	}
	
	public int getCount() {
		
		return entries.size();
	}

	public entry getItem(int position) {

		return entries.get(position);
	}

	public long getItemId(int position) {
		
		return position;
	}

	public View getView(int position, View arg1, ViewGroup arg2) {
		
		LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		View v = inflater.inflate(R.layout.item, null);
		
		TextView pname = (TextView) v.findViewById(R.id.photo_name);		
		TextView pdate = (TextView) v.findViewById(R.id.date);
		ImageView pimage = (ImageView) v.findViewById(R.id.imageView1);
		
		pname.setText(	entries.get(position).getName()	);
		pdate.setText(	entries.get(position).getDate() );	
		
		
		String outPath = "/sdcard/" + entries.get(position).getIname();
	
        Bitmap bitmap = BitmapFactory.decodeFile(outPath);
        pimage.setImageBitmap(bitmap);
		
		return v;		
	}
	
	

}
