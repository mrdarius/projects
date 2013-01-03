package adapter;

import model.entry;
import android.content.ContentValues;
import android.content.Context;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.database.sqlite.SQLiteOpenHelper;
import android.database.sqlite.SQLiteDatabase.CursorFactory;
import android.preference.PreferenceManager;
import android.util.Log;

public class PhotoDBAdapter {
	
	private static SQLiteDatabase db;
	private SQLiteDatabase sql;
	private Cursor cursor;
	private SQLite dbHelper;	
	
	public PhotoDBAdapter (Context ctx) {
		
		dbHelper = new SQLite(ctx);
		
	}	
	
	public void open() throws SQLiteException{

		try
		{
			db = dbHelper.getWritableDatabase();
		}catch(SQLiteException e)
		{
			e.printStackTrace();
			db = dbHelper.getReadableDatabase();
		}
	}
	
	public void close()
	{
		db.close();
	}	

	public void insertPhoto(String fname, String iname, int eyear, int emonth, int eday) {			
		
		ContentValues values = new ContentValues();
		
		values.put(entry.EYEAR, eyear);
		values.put(entry.EMONTH, emonth);
		values.put(entry.EDAY, eday);
		values.put(entry.INAME, iname);
		values.put(entry.FNAME, fname);
		
		Log.d("PhotoDBAdapter", "Entry: " + eyear + "-" + emonth + "-" + eday + " | " + fname + "->" + iname);
		
		db.insert(entry.TABLE, null, values);
		
	}
	
	public Cursor getAll() {
		
		cursor = db.query(entry.TABLE, new String[] 
				{ entry.ID, entry.EYEAR, entry.EMONTH, entry.EDAY, entry.FNAME, entry.INAME},
				null, null, null, null, null);
		
		return cursor;
	}
	
	public class SQLite extends SQLiteOpenHelper {		
		
		private String sql;

		SQLite(Context context)
		{	
			super(context, entry.DATABASE_NAME, null, 1);	  
		}	

		@Override
		public void onCreate(SQLiteDatabase db) {

			sql = "CREATE TABLE " + entry.TABLE + " (";
			sql += entry.ID + " INTEGER PRIMARY KEY AUTOINCREMENT, ";			
			sql += entry.EYEAR + " INTEGER, ";
			sql += entry.EMONTH + " INTEGER, ";
			sql += entry.EDAY + " INTEGER, ";			
			sql += entry.FNAME + " TEXT, ";
			sql += entry.INAME+ " TEXT)";
			
			Log.d("DB", "Query: " + sql);
			
			db.execSQL(sql);
			
		}

		@Override
		public void onUpgrade(SQLiteDatabase arg0, int arg1, int arg2) {
			
		}
	}
}
